<template>
  <div class="Raid">
    <transition name="modalTransition">
      <Booking v-if="isBookingModalShown" @hide="toggleBookingModal" />
    </transition>
    <h1 class="riadTitle">{{ Riad.title }}</h1>
    <div
      class="descriptionArea"
      :style="{
        'background-image':
          'url(http://localhost:8000/images/' + Riad.image_path + ')',
      }"
    >
      <p class="description">
        {{ Riad.description }}
      </p>
    </div>
    <img class="line" src="../assets/Line.png" alt="" />
    <div class="info">
      <div class="infoSubContainer">
        <p class="infoTitle">-Location:</p>
        <p class="infoContent">{{ Riad.city }}</p>
      </div>
      <div class="infoSubContainer">
        <p class="infoTitle">-Bedrooms:</p>
        <p class="infoContent">{{ Riad.numberOfRooms }}</p>
      </div>
      <div class="infoSubContainer">
        <p class="infoTitle">-Bathrooms:</p>
        <p class="infoContent">{{ Riad.numberOfBathrooms }}</p>
      </div>
    </div>

    <div class="galleryConatiner">
      <div
        v-for="RiadImage in RiadImages"
        :key="RiadImage.id"
        class="riadImage"
        :style="{
          'background-image':
            'url(http://localhost:8000/images/' + RiadImage.image_path + ')',
        }"
      ></div>
    </div>

    <img class="arrow" src="../assets/downArrow.png" alt="" />

    <p class="price">
      {{ Riad.price_night }} <sub class="smaller">DH / night</sub>
    </p>
    <button class="bookingbutton" @click="toggleBookingModal">Book Now</button>

    <div class="reviewsContainer">
      <h1 v-if="isReviewSectionShown" class="reviewHeader">Visitors Reviews</h1>
      <Review
        v-for="review in RiadReviews"
        :key="review.id"
        :content="review.content"
        :rating="review.rating"
        :userName="review.userName"
      />
      <button @click="toggleReviewForm" class="addReview">Add Review</button>
      <WriteReview
        @hideReviewForm="emited"
        v-if="isReviewFormShown && isAlowedToReview"
      />
    </div>
  </div>
</template>

<script>
import Review from "../components/Review.vue";
import Booking from "../components/Booking.vue";
import WriteReview from "../components/WriteReview.vue";
import axios from "axios";
export default {
  components: {
    Review,
    Booking,
    WriteReview,
  },
  data() {
    return {
      Riad: null,
      RiadImages: null,
      RiadReviews: {
        rating: null,
        content: null,
        userName: null,
      },
      ReviewsUserNames: null,
      isLoading: false,
      isBookingModalShown: false,
      isReviewFormShown: false,
      isAlowedToReview: false,
      isReviewSectionShown: false,
    };
  },

  methods: {
    toggleBookingModal() {
      if (localStorage.getItem("userId")) {
        this.isBookingModalShown = !this.isBookingModalShown;
      }
    },

    toggleReviewForm() {
      this.isReviewFormShown = !this.isReviewFormShown;
      let booked = localStorage.getItem("booked_riad");
      let booking = localStorage.getItem("booking_id");
      if (booked == this.$route.params.id && booking) {
        this.isAllowedToReview = true;
      }
    },

    emited() {
      this.isAllowedToReview = false;
    },
  },
  created() {
    if (
      localStorage.getItem("booked_riad") == this.$route.params.id &&
      localStorage.getItem("booking_id")
    ) {
      this.isAlowedToReview = true;
    }
    axios
      .get(`http://localhost:8000/api/riads/${this.$route.params.id}`)
      .then((response) => {
        this.Riad = response.data;
        console.log(this.Riad);
      });

    axios
      .get(`http://localhost:8000/api/riads/images/${this.$route.params.id}`)
      .then((response) => {
        this.RiadImages = response.data;
        console.log(this.RiadImages);
      });

    axios
      .get(`http://localhost:8000/api/riads/${this.$route.params.id}/reviews`)
      .then((response) => {
        this.RiadReviews = response.data;
        console.log(this.RiadReviews);
        if (this.RiadReviews.length != 0) {
          this.isReviewSectionShown = true;
          console.log(this.isReviewSectionShown);
          this.RiadReviews.forEach((review) => {
            axios
              .get(`http://localhost:8000/api/review/${review.id}/user`)
              .then((response) => {
                review.userName = response.data;
              });
          });
        }
      });
  },
};
</script>

<style scoped>
.modalTransition-enter-from {
  opacity: 0;
}

.modalTransition-enter-active,
.modalTransition-leave-active {
  transition: opacity 0.6s ease;
}

.modalTransition-leave-to {
  opacity: 0;
}
.Raid {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px;
}
.riadTitle {
  color: #996515;
  font-weight: normal;
  font-family: voga;
  font-size: 50px;
  padding-left: 20px;
  border-left: 2px solid #996515;
  margin: 50px 0;
}

.descriptionArea {
  height: 700px;
  width: 90%;
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  border: #996515 1px solid;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.description {
  font-family: luxia;
  font-size: 22px;
  color: rgb(29, 29, 29);
  background: #996415cc;
  width: 60%;
  text-align: center;
  padding: 30px;
}
.info {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 40px;
  width: 60%;
  background: rgb(32, 32, 32);
  color: #996515;
  font-family: luxia;
  margin: 30px 0;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.infoTitle {
  font-size: 24px;
}
.infoContent {
  font-size: 18px;
}
.addReview {
  padding: 10px 20px;
  font-family: luxia;
  color: #996515;
  background: rgb(29, 29, 29);
  border: 1px solid #996515;
  font-size: 20px;
}
.infoSubContainer {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.line {
  width: 320px;
  margin: 30px 0;
}

.price {
  color: #996515;
  font-family: luxia;
  font-size: 65px;
  padding: 30px;
  margin-top: 60px;
}
.smaller {
  font-size: 30px;
}

.bookingbutton {
  border: 1px solid #996515;
  color: #996515;
  padding: 10px 20px;
  background: rgb(32, 32, 32);
  letter-spacing: 2px;
  transition: all 0.3s ease;
  font-size: 30px;
  font-family: luxia;
  cursor: pointer;
}

.galleryConatiner {
  width: 90%;
  display: flex;
  flex-wrap: wrap;
  margin: 100px 0;
}

.riadImage {
  width: 48%;
  margin: 1%;
  height: 500px;
  background-size: cover;
  background-position: center;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.arrow {
  width: 100px;
}

.reviewsContainer {
  padding: 30px;
  display: flex;
  flex-direction: column;
  gap: 100px;
  /* justify-content: space-between; */
  align-items: center;
  width: 80%;
  margin: 100px 0;
  background-color: rgb(32, 32, 32);
  /* height: 900px; */
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.reviewHeader {
  color: #996515;
  font-size: 30px;
  font-family: luxia;
  margin: 20px 0 70px 0;
}
</style>