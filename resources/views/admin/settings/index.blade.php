@extends('admin.main')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900 mb-4">
                Instellingen
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                <p>Diverse systeeminstellingen kunnen hier worden aangepast.</p>
            </div>
        </div>
    </div>
</div>

<div class="card ">
    <div class="card-header card-header-stretch">
        <h3 class="card-title" id="card-title">Algemeen</h3>
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_algemeen" data-title="Algemeen">Algemeen</a>
                </li>
                @foreach($plugins as $plugin)
                    @php
                        $pluginConfigPath = $plugin . '/config.php';
                        $pluginConfig = File::exists($pluginConfigPath) ? include($pluginConfigPath) : null;
                        $pluginEnabled = config('plugins.enabled.' . basename($plugin)) ?? false;
                    @endphp
                    @if($pluginEnabled && !empty($pluginConfig['settings']))
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_{{ Str::slug($pluginConfig['name']) }}" data-title="{{ $pluginConfig['name'] }}">{{ $pluginConfig['name'] }}</a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_plugins" data-title="Plugins">Plugins</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="kt_tab_algemeen" role="tabpanel">
                <form class="settings-form" action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-0">
                        <label for="api_urls" class="form-label">Toegestane API URL(s)</label>
                        <textarea class="form-control" id="api_urls" name="api_urls" rows="3">{{ $settings->where('name', 'api_urls')->first()->value ?? '' }}</textarea>
                    </div>
                </form>
            </div>
            @foreach($plugins as $plugin)
                @php
                    $pluginConfigPath = $plugin . '/config.php';
                    $pluginConfig = File::exists($pluginConfigPath) ? include($pluginConfigPath) : null;
                    $pluginSettings = $pluginConfig['settings'] ?? [];
                    $pluginEnabled = config('plugins.enabled.' . basename($plugin)) ?? false;
                @endphp
                @if($pluginEnabled && !empty($pluginSettings))
                    <div class="tab-pane fade" id="kt_tab_{{ Str::slug($pluginConfig['name']) }}" role="tabpanel">
                        <form class="settings-form" action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            @foreach($pluginSettings as $key => $setting)
                                <div class="{{ $loop->last ? 'mb-0' : 'mb-7' }}">
                                    <label for="{{ $key }}" class="form-label">{{ $setting['label'] }}</label>
                                    @if($setting['type'] == 'number')
                                        <input type="number" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ $settings->where('name', $key)->first()->value ?? '' }}">
                                    @elseif($setting['type'] == 'text')
                                        <input type="text" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ $settings->where('name', $key)->first()->value ?? '' }}">
                                    @elseif($setting['type'] == 'textarea')
                                        <textarea class="form-control" id="{{ $key }}" name="{{ $key }}" rows="3">{{ $settings->where('name', $key)->first()->value ?? '' }}</textarea>
                                    @endif
                                </div>
                            @endforeach
                        </form>
                    </div>
                @endif
            @endforeach

            <div class="tab-pane fade" id="kt_tab_plugins" role="tabpanel">
                <table class="table table-striped mb-0">
                    <tbody>
                        @php
                            $enabledPlugins = config('plugins.enabled');
                        @endphp
                        @foreach($plugins as $plugin)
                            @php
                                $pluginName = basename($plugin);
                                $isEnabled = isset($enabledPlugins[$pluginName]) && $enabledPlugins[$pluginName];
                            @endphp
                            @php
                                $pluginConfigPath = $plugin . '/config.php';
                                $pluginConfig = File::exists($pluginConfigPath) ? include($pluginConfigPath) : null;
                                $pluginDisplayName = $pluginConfig['name'] ?? $pluginName;
                            @endphp
                            <tr>
                                <td>{{ $pluginDisplayName }}</td>
                                <td class="text-end">
                                    @if($isEnabled)
                                        <button class="btn btn-sm btn-secondary" onclick="uninstallPlugin('{{ $pluginName }}')" data-plugin="{{ $pluginName }}">Deïnstalleren</button>
                                    @else
                                        <button class="btn btn-sm btn-primary" onclick="installPlugin('{{ $pluginName }}')" data-plugin="{{ $pluginName }}">Installeren</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let timeout;
    const forms = document.querySelectorAll('.settings-form');
    console.log(forms); 
    forms.forEach(form => {
        // Sla de oorspronkelijke waarden van de velden op
        const originalValues = {};
        form.querySelectorAll('input, textarea').forEach(input => {
            originalValues[input.name] = input.value;
        });

        form.addEventListener('input', function(event) {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                saveSettings(form, originalValues);
            }, 1000);
        });
    });

    function saveSettings(form, originalValues) {
        const formData = new FormData();

        // Voeg alleen de gewijzigde velden toe aan formData
        form.querySelectorAll('input, textarea').forEach(input => {
            if (input.value !== originalValues[input.name]) {
                formData.append(input.name, input.value);
            }
        });

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'X-HTTP-Method-Override': 'PUT'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toastr.success('Instellingen succesvol bijgewerkt.');
                document.activeElement.blur();
            } else {
                toastr.error('Er is een fout opgetreden bij het opslaan.');
            }
        })
        .catch(error => {
            toastr.error('Er is een fout opgetreden bij het opslaan.');
        });
    }

    // Update card title on tab click
    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            document.getElementById('card-title').textContent = title;
        });
    });

    function toggleLoading(button, isLoading) {
        if (isLoading) {
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + button.textContent;
        } else {
            button.disabled = false;
            button.innerHTML = button.textContent.replace('<i class="fas fa-spinner fa-spin"></i> ', '');
        }
    }

    function setActiveTab() {
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            const tabElement = document.querySelector(`.nav-link[href="${activeTab}"]`);
            if (tabElement) {
                tabElement.classList.add('active');
                document.querySelector(activeTab).classList.add('show', 'active');
                document.getElementById('card-title').textContent = tabElement.getAttribute('data-title');
            }
        } else {
            document.querySelector('.nav-tabs .nav-link:first-child').click();
        }
    }

    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function() {
            const title = this.getAttribute('data-title');
            //document.getElementById('card-title').textContent = title;
            localStorage.setItem('activeTab', this.getAttribute('href'));
        });
    });

    window.addEventListener('load', setActiveTab);

    function installPlugin(pluginName) {
        const button = document.querySelector(`button[data-plugin="${pluginName}"]`);
        toggleLoading(button, true);

        fetch(`/plugins/install/${pluginName}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toastr.success(`Plugin ${pluginName} succesvol geïnstalleerd.`);
                setTimeout(() => {
                    location.reload(); // Herlaad de pagina om de status bij te werken
                }, 3000);
            } else {
                toastr.error(`Er is een fout opgetreden bij het installeren van ${pluginName}.`);
            }
        })
        .catch(error => {
            toggleLoading(button, false);
            toastr.error(`Er is een fout opgetreden bij het installeren van ${pluginName}.`);
        });
    }

    function uninstallPlugin(pluginName) {
        const button = document.querySelector(`button[data-plugin="${pluginName}"]`);
        toggleLoading(button, true);

        fetch(`/plugins/uninstall/${pluginName}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toastr.success(`Plugin ${pluginName} succesvol gedeïnstalleerd.`);
                setTimeout(() => {
                    location.reload(); // Herlaad de pagina om de status bij te werken
                }, 3000);
            } else {
                toastr.error(`Er is een fout opgetreden bij het deïnstalleren van ${pluginName}.`);
            }
        })
        .catch(error => {
            toggleLoading(button, false);
            toastr.error(`Er is een fout opgetreden bij het deïnstalleren van ${pluginName}.`);
        });
    }
</script>
@endsection 