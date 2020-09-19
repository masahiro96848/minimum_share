<template>
  <div>
    <input 
      type="hidden" 
      name="star" 
      :value="rating"
    >
    <star-rating
      
      :max-rating="maxRating"
      :star-size="starSize"
      :inactive-color="inactiveColor"
      :active-color="activeColor"
      @rating-selected="selectRating"
      :current-rating="currentRating"
      :set-rating="setRating"
      :read-only="readOnly"
      :show-rating="showRating"
      v-model="rating"
    >

    </star-rating>
  </div>
</template>

<script>
import StarRating from 'vue-star-rating'
export default {
  components: {
    StarRating
  },
  props: {
    increment: {
      type: Number,
      default: 1
    },
    maxRating: {
      type: Number,
      default: 5
    },
    starSize: {
      type: Number,
      default: 50
    },
    inactiveColor: {
      type: String,
      default: '#000000'
    },
    activeColor: {
      type: String,
      default: '#ffd055'
    },
    rating: {
      type: [String, Number],
      default: () => 0,
    },
    showRating: {
      type: Boolean,
      default: false
    },
    readOnly: {
      type: Boolean,
      default: false
    },
    currentRating: {
      type: Number
    },
  },
  data() {
    return {
      setRating: 0,
      dataRating: this.rating,
    };
    
  },
  
  mounted() {
    if(this.setRating) {
      return this.currentRating = this.setRating;
    }
  },
  methods: {
    selectRating: function(rating) {
      this.dataRating = rating;
    },

    
  },
  
}
</script>
