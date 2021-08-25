<template>
  <div class="Review">
    <div class="nameAndRating">
      <p class="reviewerName">{{ userName }}</p>
      <Starrating :rating="rating" />
    </div>
    <p class="reviewBody">
      {{ content }}
    </p>
    <hr class="line" />
  </div>
</template>

<script>
import Starrating from "../components/Starrating.vue";
export default {
  name: "Review",
  components: {
    Starrating,
  },
  props: {
    content: String,
    rating: Number,
    userName: String,
  },
};
</script>

<style  scoped>
.Review {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 90%;
}

.nameAndRating {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.reviewerName {
  font-family: Luxia;
  color: #996515;
  font-size: 21px;
}

.reviewBody {
  color: gray;
  font-family: luxia;
}

.line {
  width: 30%;
  border: 1px solid #996515;
  margin: auto;
}
</style>