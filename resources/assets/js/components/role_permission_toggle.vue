<template>
    <button class="btn btn-xs" :class="{'btn-success': enabled, 'btn-danger': !enabled }" v-on:click="toggleState" style="width:70px;">
        <span v-if="enabled"> <i class="fa fa-check">&nbsp;</i>Enabled</span>
        <span v-else> <i class="fa fa-times">&nbsp;</i>Disabled</span>
    </button>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                active: true
            }
        },
        props: ['role_id', 'permission_id', 'enabled'],
        methods: {
            'toggleState': function(){

                axios.post('/admin/role_permission?role_id=' + this.role_id + '&permission_id=' + this.permission_id, {
                    'enabled': this.enabled
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

                this.enabled = ! this.enabled;
            }
        }
    }
</script>
