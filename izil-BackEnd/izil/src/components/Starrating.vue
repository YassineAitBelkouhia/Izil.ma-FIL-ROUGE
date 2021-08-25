<template>
  <div>
    <img
      v-for="star in fullStar"
      :key="'full' + star"
      class="star"
      src="../assets/FullStar.png"
      @click="$emit('changeRating', star)"
    />
    <img v-if="halfStar" class="star" src="../assets/halfStar.png" alt="" />
    <img
      v-for="star in emptyStar"
      :key="'empty' + star"
      class="star"
      src="../assets/emptyStar.png"
      @click="$emit('changeRating', fullStar + star)"
    />
  </div>
</template>

<script>
export default {
  name: "Starrating",
  props: {
    rating: Number,
  },
  computed: {
    halfStar() {
      const fraction = Math.round(
        (this.rating - Math.floor(this.rating)) * 100
      );
      return fraction > 0 && fraction < 50;
    },
    fullStar() {
      return Math.round(this.rating);
    },
    emptyStar() {
      return 5 - Math.ceil(this.rating);
    },
  },
};
</script>

<style scoped>
.star {
  width: 30px;
}
</style>