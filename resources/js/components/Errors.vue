<template>
  <div>
    <div v-for="error in errors">
      <b-alert show variant="danger" >
        <span v-for="message in error">{{ message }}</span>
      </b-alert>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    errors: {
      type: Object,
      default: 'NULL'
    },
    content: {
      type: String,
      default: 'NULL'
    },
  }
}
</script>