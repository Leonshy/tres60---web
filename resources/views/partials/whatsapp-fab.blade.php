<a
    x-data="{
        visible: false,
        init() {
            const hero = document.getElementById('inicio');
            const contacto = document.getElementById('contacto');
            const heroObserver = new IntersectionObserver(([entry]) => {
                this.visible = !entry.isIntersecting;
            }, { threshold: 0 });
            heroObserver.observe(hero);

            const contactoObserver = new IntersectionObserver(([entry]) => {
                this.$el.classList.toggle('opacity-40', entry.isIntersecting);
            }, { threshold: 0.5 });
            contactoObserver.observe(contacto);
        },
    }"
    x-show="visible"
    x-transition
    href="https://wa.me/{{ config('tres360.whatsapp') }}?text={{ urlencode(config('tres360.wa_texto')) }}"
    target="_blank"
    rel="noopener"
    aria-label="Contactar por WhatsApp"
    class="fixed bottom-5 right-5 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg transition duration-200 hover:-translate-y-0.5 md:bottom-6 md:right-6"
>
    <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.148.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12.004 2.003c-5.514 0-9.997 4.483-9.997 9.997 0 1.762.464 3.484 1.345 4.997L2 22l5.13-1.345a9.958 9.958 0 0 0 4.874 1.242h.004c5.514 0 9.997-4.483 9.997-9.997 0-2.67-1.04-5.182-2.928-7.07a9.93 9.93 0 0 0-7.073-2.827zm5.845 15.842a8.28 8.28 0 0 1-5.845 2.42h-.003a8.26 8.26 0 0 1-4.212-1.153l-.302-.18-3.045.799.813-2.97-.197-.305a8.264 8.264 0 0 1-1.266-4.416c0-4.57 3.719-8.29 8.293-8.29a8.24 8.24 0 0 1 5.86 2.432 8.24 8.24 0 0 1 2.428 5.862 8.28 8.28 0 0 1-2.424 5.801z"/></svg>
</a>
