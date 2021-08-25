<template>
  <div class="reviewForm">
    <div class="formContainer">
      <p class="formText">Rate Riad</p>
      <Starrating :rating="reviewData.rating" @changeRating="onRatingChange" />
      <p class="formText">Describe your journey</p>
      <textarea
        v-model="reviewData.content"
        class="content"
        cols="70"
        rows="10"
      ></textarea>
      <button @click="submitReview" class="submitButton">Submit</button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Starrating from "../components/Starrating";
export default {
  name: "WriteReview",
  components: {
    Starrating,
  },
  data() {
    return {
      reviewData: {
        rating: 5,
        content: null,
        riad_id: localStorage.getItem("booked_riad"),
        booking_id: localStorage.getItem("booking_id"),
        user_id: localStorage.getItem("userId"),
      },
    };
  },

  methods: {
    onRatingChange(rating) {
      this.reviewData.rating = rating;
    },
    submitReview() {
      axios
        .post(`http://localhost:8000/api/reviews`, this.reviewData)
        .then(function (response) {
          console.log(response);
        });
      this.$router.push("/Explore");
    },
  },
};
</script>

<style scoped>
.formContainer {
  display: flex;
  flex-direction: column;
  gap: 20px;
  justify-content: center;
  align-items: center;
}

.submitButton {
  padding: 10px 20px;
  font-family: luxia;
  color: #996515;
  background: rgb(29, 29, 29);
  border: 1px solid #996515;
  font-size: 16px;
  cursor: pointer;
}
.content {
  background: #996515;
  border: 1px solid rgb(29, 29, 29);
  font-family: luxia;
  outline: none;
  padding: 20px;
  font-size: 18px;
  color: rgb(29, 29, 29);
}

.formText {
  font-family: luxia;
  color: #996515;
  font-size: 20px;
}
</style>