<template>
  <div>
    <input 
      type="hidden"
      name="tags"
      :value="tagsJson"
      class="c-post--tags"
    >

    <vue-tags-input
      v-model="tag"
      :tags="tags"
      placeholder="タグ名を入力してください(5個まで)"
      @tags-changed="newTags => tags = newTags"
      :autocomplete-items="filteredItems"
      :add-on-key="[13, 32]"
    >


    </vue-tags-input>
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
  components: {
    VueTagsInput
  },
  props: {
    initialTags: {
      type: Array,
      default: [],
    },
    autocompleteItems: {
      type: Array,
      defalut: [],
    }
  },
  data() {
    return {
      tag: '',
      tags: this.initialTags, 
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
      return JSON.stringify(this.tags)
    },
  },
};
</script>

