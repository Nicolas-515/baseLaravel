@extends('home.home_landing')
@section('home')

<div class="page-content">
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="{{ $idPersonagem['image'] }}" class="align-self-start wd-100 wd-sm-150 me-3" alt="...">
                                <div>
                                    <h5 class="mb-2">
                                        {{ $idPersonagem['name'] }}
                                    </h5>
                                    <br>
                                    <p>
                                        {{ "Espécie: ". $idPersonagem['species'] }}
                                    </p>
                                    <p>
                                        {{ "Gênero: ". $idPersonagem['gender'] }}
                                    </p>
                                    <p>
                                        {{ "Local: ". $idPersonagem['location']['name'] }}
                                    </p>
                                    <p>
                                        {{ "Url: ". $idPersonagem['url'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection