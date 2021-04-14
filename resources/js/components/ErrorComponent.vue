<template>
  <span class="invalid-feedback" role="alert">
    <strong>{{ err }}</strong>
  </span>
</template>

<script>
export default {
  props: {
    err: {
      type: String,
      required: true
    }
  }
}
</script>
