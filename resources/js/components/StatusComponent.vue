<template>
  <div class="alert alert-success alert-dismissible" role="alert">
    <strong>Успешно!</strong>
    {{ msg }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    msg: {
      type: String,
      required: true
    }
  }
}
</script>
