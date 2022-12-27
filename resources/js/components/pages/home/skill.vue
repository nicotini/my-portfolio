<template>
    <div class="skills_container container grid">
        <div v-if="services" v-for="service in services" :key="service.id">
            <!--=========== SKILL 1 ============-->
            <div  class="skills_content skills_open" :ref="`item-${service.id}`"  @click="serviceAccordion(service.id)">
                <div class="skills_header">
                    <i class="uil uil-brackets-curly skills_icon"></i>

                    <div>
                        <h1 class="skills_title">{{ service.title }}</h1>
                        <span class="skills_subtitle">More than 4 years</span>
                    </div>

                    <i class="uil uil-angle-down skills_arrow"></i>
                </div>
                <div v-if="service.skills" v-for="skill in service.skills" :key="skill.id" class="skills_list grid">
                    <div class="skills_data">
                        
                        <div class="skills_titles">
                            <h3 class="skills_name">{{ skill.title }}</h3>
                            <span class="skills_number">{{skill.proficiency}}%</span>
                        </div>
                        <div class="skills_bar">
                            <span class="skills_percentage skills_html"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'skill',
    props: {
        services: {
            type: Object,
            required: true
        }
    },
    methods: {
        serviceAccordion(id) {
            const el = this.$refs[`item-${id}`]
           for (let index = 0; index < el.length; index++) {
            const element = el[index];
           
            if(element.classList.contains('skills_open')) {
                element.classList.remove('skills_open')
                element.classList.add('skills_close')
            } else {
                element.classList.remove('skills_close')
                element.classList.add('skills_open')
            }
           }
        }
    }
}
</script>