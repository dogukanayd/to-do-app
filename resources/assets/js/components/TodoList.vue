<template>
  <p>{{todo}} ---> Created At: {{created_at}} <button @click="del" class="btn-danger float-right">X</button></p>
</template>

<script>
    export default{
        methods: {
            del(){
                this.$emit('delete', this.id);
            }
        },

        props: ['id', 'todo', 'user_id', 'created_at']
    }
</script>
