<template>
  <form @submit.prevent="fetchMessage" id="form" class="col-md-8 mx-auto my-4">
    <Status v-show="status" v-bind:msg="status" />
    <div class="form-group">
      <input v-model="name" type="text" class="form-control px-3 py-4" v-bind:class="{ 'is-invalid': errors.name }" placeholder="Имя" minlength="2" maxlength="50" required autofocus>
      <Error v-if="errors.name" v-bind:err="errors.name" />
    </div>
    <div class="form-group">
      <textarea v-model="message" class="form-control p-3" v-bind:class="{ 'is-invalid': errors.message }" id="message" name="message" placeholder="Сообщение" rows="7" maxlength="1000" required></textarea>
      <Error v-if="errors.message" v-bind:err="errors.message" />
    </div>
    <div class="form-group">
      <div class="col-md-6 mx-auto">
        <Error v-if="errors.message" v-bind:err="errors.captcha" />
      </div>
    </div>
    <button type="submit" class="btn btn-lg btn-block btn-primary">
      {{ isLoading ? 'Загрузка...' : 'Отправить' }}
    </button>
  </form>
</template>

<script>
import Status from './StatusComponent'
import Error from './ErrorComponent'

export default {
  components: {
    Status,
    Error
  },
  data() {
    return {
      name: '',
      message: '',
      status: '',
      isLoading: false,
      errors: {
        name: null,
        message: null
      }
    }
  },
  methods: {
    fetchMessage() {
      this.isLoading = true

      this.name = this.name.trim()
      this.message = this.message.trim()

      if (this.name && this.message) {
        fetch('/api/guestbook', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            name: this.name,
            message: this.message
          })
        })
        .then(res => res.json())
        .then(res => {
          if (res.errors)
            throw res

          this.status = res.message
          this.isLoading = false
          this.name = ''
          this.message = ''
          this.errors = {
            name: null,
            message: null
          }
        })
        .catch(err => {
          if (err.errors.name)
            this.errors.name = err.errors.name[0]
          if (err.errors.message)
            this.errors.message = err.errors.message[0]

          this.status = ''
          this.isLoading = false
        })
      }
    }
  }
}
</script>
