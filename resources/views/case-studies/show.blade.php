@php /** @var \App\Models\CaseStudy $case_study */ @endphp
<x-front-layout>
    <x-slot name="title">{{ $case_study->title }} - Étude de cas</x-slot>
    <x-slot name="description">{{ $case_study->description }}</x-slot>
    <x-slot name="illustration">{{ config('app.url') . \Illuminate\Support\Facades\Storage::url($case_study->illustration) }}</x-slot>
    <section class="bg-light py-5 py-lg-10">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 markdown">
                    <h2>{{ $case_study->title }}</h2>
                    <h3 class="text-gray-700">Étude de cas</h3>
                    <p class="lead">
                        {{ $case_study->description }}
                    </p>
                    <hr />
                    {!! $case_study->html !!}
                    <div class="row justify-content-center" data-aos="fade-up">
                        <a class="btn btn-primary w-auto" href="https://calendly.com/p-cauty/premier-echange"
                           target="_blank" rel="noopener">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Prendre rendez-vous
                        </a>
                    </div>
                    <hr class="my-5" />
                    <div class="text-center">
                        <a class="btn btn-transparent-dark" href="{{ route('case-studies.index') }}">
                            &larr; Retour aux études de cas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-statistics />
    <x-testimonials />
    <x-f-a-q />
    <script src="{{ asset('js/highlight.min.js') }}"></script>
    <script>hljs.highlightAll();</script>
</x-front-layout>
