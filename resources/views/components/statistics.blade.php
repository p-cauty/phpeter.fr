<!-- Statistics -->
<section class="bg-primary py-5">
    <div class="container px-5 py-3">
        <div class="row gx-5 text-center">
            <div class="col-lg-4 px-lg-5 mb-5 mb-lg-0">
                <h1><span class="increment">140</span>+</h1>
                <h5 class="text-uppercase text-white">Projets terminés</h5>
            </div>
            <div class="col-lg-4 px-lg-5 mb-5 mb-lg-0">
                <h1><span class="increment">30</span>+</h1>
                <h5 class="text-uppercase text-white">Clients satisfaits</h5>
            </div>
            <div class="col-lg-4 px-lg-5 mb-5 mb-lg-0">
                <h1><span class="increment">15</span>+</h1>
                <h5 class="text-uppercase text-white">Années d'expérience</h5>
            </div>
        </div>
    </div>
</section>
<script>
    // make every element with the class 'increment' animate from 0 to its innerText value when it comes into view
    const incrementEls = document.querySelectorAll('.increment');
    const increment = (el) => {
        const end = parseInt(el.innerText);
        const duration = 1000;
        let start = 0;
        const step = (timestamp) => {
            if (!start) start = timestamp;
            const progress = timestamp - start;
            el.innerText = Math.min(Math.ceil((progress / duration) * end), end);
            if (progress < duration) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    let doneOnce = false;
    const observer = new IntersectionObserver(
        (entries) => {
            if (doneOnce) return;

            entries.forEach((entry) => {
                if (entry.intersectionRatio > 0) {
                    increment(entry.target);
                    doneOnce = true;
                }
            });
        },
        {
            threshold: 0.5,
        }
    );

    incrementEls.forEach((el) => {
        observer.observe(el);
    });
</script>
