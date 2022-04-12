<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <title>Telzir</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
          rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
</head>

<body class="antialiased">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/"
               class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Telzir</span>
            </a>
        </header>
    </div>

    <div class="container">
        <div class="alert alert-danger text-center"
             id="msg_error"
             style='display: none'></div>
        <div class="row mb-2">
            <h4>Simule abaixo o valor da sua ligação: </h4>
        </div>
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="origin_number">Número de origem</label>
                    <select class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example"
                            name="origin"
                            id="origin"
                            onchange="fillSelectDestiny()">
                        <option value=""
                                selected>Selecione</option>
                        @foreach ($areaCodes as $areaCode)
                            <option value="{{ $areaCode->id }}">
                                {{ $areaCode->area_code }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="origin_number">Número de destino</label>
                    <select class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example"
                            name="destiny"
                            id="destiny"
                            onchange="releaseSelect('time')">
                        <option value=""
                                selected>Selecione</option>
                        @foreach ($areaCodes as $areaCode)
                            <option value="{{ $areaCode->id }}"
                                    disabled>
                                {{ $areaCode->area_code }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="origin_number">Duração da ligação</label>
                </div>
                <input class="form-control form-control-lg"
                       type="number"
                       name="time"
                       id="time"
                       min="1"
                       onchange="releaseSelect('plan')"
                       disabled>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="origin_number">Plano FaleMais</label>
                    <select class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example"
                            name="plan"
                            id="plan"
                            onchange="calculate()"
                            disabled>
                        <option value=""
                                selected>Selecione</option>
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->plan }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mb-3 text-center"
             id="comparative"
             style="display: none">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Com FaleMais</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"
                            id="withPlan"
                            name='withPlan'></h1>
                    </div>
                    <div class="card-footer">
                        <a href="/"
                           type="submit"
                           class="w-100 btn btn-lg btn-primary">
                            Contratar
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Sem FaleMais</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"
                            id="withoutPlan"></h1>
                    </div>
                    <div class="card-footer">
                        <button type="button"
                                class="w-100 btn btn-lg btn-primary"
                                disabled>
                            Sugerimos utilizar o plano FaleMais
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->

    <script type="text/javascript"
            src="{{ asset('js/app.js') }}"
            defer>
    </script>
    <script type="text/javascript"
            src="{{ asset('js/main.js') }}"
            defer>
    </script>

</body>

</html>
