<template>
  <div>
    <button
      class="c-button c-button--follow"
      :class="buttonColor"
      @click="clickFollow"
    >
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    initialIsFollowedBy: {
      type: Boolean,
      default: false,
    }, 
    authorized: {
      type: Boolean,
      default: false
    },
    endpoint: {
      type: String
    },
  },
  data() {
    return {
      isFolloewedBy: this.initialIsFollowedBy,
    }
  },
  computed: {
    buttonColor() {
      return this.isFolloewedBy
      ? 'c-button--follow c-button--follow--after'
      : 'c-button--follow c-button--follow--before'
    },
    buttonText () {
      return this.isFolloewedBy
      ? 'フォロー中'
      : 'フォロー'
    },
  },
  methods: {
    clickFollow() {
      if(!this.authorized) {
        alert('フォロー機能はログイン中のみ利用できます。')
        return
      }
      this.isFolloewedBy
        ? this.unfollow()
        : this.follow()
    },

    async follow() {
      const response = await axios.put(this.endpoint)

      this.isFolloewedBy = true
    },
    async unfollow() {
      const response = await axios.delete(this.endpoint)

      this.isFolloewedBy = false
    }
  }
}
</script>
