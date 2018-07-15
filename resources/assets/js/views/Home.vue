<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="message">
                    <div class="message-header" v-text="statuses">
                    
                 </div>


                 <div class="message-body">
                    Home
                </div>
            </div>
               

        </div>
    </div>
</div>
</template>

<script>

    export default {
        data(){
            return {
                statuses: 'Hello'
            }
        },

    }
</script>
