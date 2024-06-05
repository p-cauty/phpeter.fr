@php /** @var \App\Models\CaseStudy[] $case_studies */ @endphp
<x-front-layout>
    <x-slot name="title">Études de cas - {{ config('app.title') }}</x-slot>
    <header class="page-header-ui page-header-ui-dark bg-img-cover overlay overlay-80 pt-15" style="background-image:url({{ asset('img/case-studies.jpg') }})">
        <div class="page-header-ui-content">
            <div class="container px-5 text-center">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="text-white mb-3">Études de cas</h1>
                        <p class="page-header-ui-text mb-0">Parcourez les témoignages de notre engagement qualité</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container px-5">
            <div class="row gx-5">
                @foreach ($case_studies as $case_study)
                <div class="col-md-6 col-xl-4 my-5 mt-lg-n5" data-aos="fade-up">
                    <a class="text-decoration-none card lift h-100" href="{{ route('case-studies.show', [
                        'case_study' => $case_study,
                        'slug' => \Illuminate\Support\Str::of($case_study->title)->slug()
                    ]) }}">
                        <div class="card-img-top" style="height:250px;background:url({{ \Illuminate\Support\Facades\Storage::url($case_study->illustration) }}) no-repeat center/cover;"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $case_study->title }}</h5>
                            <p class="card-text text-gray-600">{{ $case_study->description }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white py-5 pb-lg-10">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 text-center py-5" data-aos="fade-up">
                    <h2>Envie d'essayer ?</h2>
                    <p class="lead text-gray-500 mb-5">
                        Prenez rendez-vous dès maintenant pour discuter de vos projets web avec notre expert.
                        L'analyse de vos besoins est gratuite et sans engagement.
                    </p>
                    <a class="btn btn-primary fw-500" href="https://calendly.com/p-cauty/premier-echange"
                        target="_blank" rel="noopener">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Prendre rendez-vous
                    </a>
                </div>
            </div>
        </div>
    </section>
    <x-statistics />
    <x-testimonials />
    <x-f-a-q />
</x-front-layout>