<template>
    
        <div class="complete-box" v-if="!completed">
            <p class="complete-btn" @click="switchon(stepId)"><i class="far fa-check-circle"></i></p>
        </div>

        <div class="complete-box" v-else>
            <p class="complete-btn" @click="switchoff(stepId)"><i class="far fa-check-circle step-completed"></i></p>
        </div>
    
</template>

<script>
    export default {
        props: ['stepId', 'defaultCompleted'],

        data() {
            return {
                completed: false,
            };
        },
        created () {
            this.completed = this.defaultCompleted
        },

        methods: {
            switchon(stepId) {
                let url = `/api/steps/${stepId}/complete`
                
                axios.post(url)
                .then(response => {
                  this.completed = true
                })
                .catch(error => {
                  alert(error)
                });
            },
            switchoff(stepId) {
                let url = `/api/steps/${stepId}/cancelcomplete`
                
                axios.post(url)
                .then(response => {
                  this.completed = false
                })
                .catch(error => {
                  alert(error)
                });
            },
        }
    }
</script>
