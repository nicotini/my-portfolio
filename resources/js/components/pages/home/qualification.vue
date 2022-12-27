<template>
    <section class="qualification section" v-if="educationPlaces || placesToWork">
        <h2 class="section__title">Qualification</h2>
        <span class="section__subtitle">My personal journel</span>

        <div class="timeline">
        <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type1"  v-for="place in educationPlaces" :key="place.id">
            <div class="timeline__event__icon ">
            <i class="lni-cake"></i>
            <div class="timeline__event__date">
                {{ place.period }}
            </div>
            </div>
            <div class="timeline__event__content ">
            <div class="timeline__event__title">
                {{ place.degree}}
            </div>
            <div class="timeline__event__description">
                <p>{{ place.institution }}</p>
            </div>
            </div>
            </div>
            <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type3" v-for="work in placesToWork" :key="work.id">
                <div class="timeline__event__icon ">
                    <i class="lni-cake"></i>
                    <div class="timeline__event__date">
                        {{ work.period }}
                    </div>
                </div>
                <div class="timeline__event__content ">
                    <div class="timeline__event__title">
                        {{ work.position}}
                    </div>
                    <div class="timeline__event__description">
                        <p>{{ work.company }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'qualification',
    props: {
        educationPlaces: {
            type: Object,
            required: true
        },
        placesToWork: {
            type: Object,
            required: true
        }
    }
}
</script>