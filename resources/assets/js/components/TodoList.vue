<template>
  <p>{{todo}} <button @click="del" class="float-right">X</button></p>
</template>

<script>
    export default{
        methods: {
            del(){
                this.$emit('delete', this.id);
            }
        },

        props: ['id', 'todo', 'user_id']
    }
</script>
