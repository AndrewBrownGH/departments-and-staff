<template>
  <div>
    <div v-for="error in errors">
      <b-alert show dismissible variant="danger" >
        <span v-for="message in error">{{ message }}</span>
      </b-alert>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    errors: {
      type: Array,
      default: []
    }
  }
}
</script>