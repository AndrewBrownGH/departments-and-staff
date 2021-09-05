<template>
  <b-button variant="danger" v-on:click="removeHandler()">
    <b-spinner small v-if="loading"></b-spinner>
    <b-icon-trash></b-icon-trash>
  </b-button>
</template>

<script>
export default {
  props: {
    removeCallback: {
      type: Function,
      default: () => {},
    },
  },
  data() {
    return {
      loading: false,
    }
  },
  methods: {
    removeHandler() {
      this.loading = true;
      this.removeCallback()
        .then(() => {
          this.loading = false;
        })
    }
  }
}
</script>