import Vue from 'vue'
import FormComponent from './components/FormComponent.vue'
import 'popper.js'
import 'jquery'
import 'bootstrap'
import './bootstrap'

Vue.component('form-component', FormComponent)

const app = new Vue({
    el: '#app'
})
