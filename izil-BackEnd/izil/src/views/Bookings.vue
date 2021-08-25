<template>
  <div class="bookings">
    <div class="bookingsContainer">
      <h1 class="bookingsHeader">Your Bookings</h1>
      <p
        v-if="this.bookings.length == 0"
        @click="gotoRiadsPage"
        class="noBookingsYet"
      >
        You have no bookings yet, Make one ? Explore
      </p>
      <div v-for="booking in this.bookings" :key="booking.id" class="booking">
        <div class="bookingDetail">
          <p class="bookingTexe">From:</p>
          <p class="bookingValue">{{ booking.from }}</p>
        </div>
        <div class="bookingDetail">
          <p class="bookingTexe">To:</p>
          <p class="bookingValue">{{ booking.to }}</p>
        </div>

        <div class="totalPrice">
          <p class="price">{{ booking.totalPrice }} DH <sub>Total</sub></p>
        </div>
        <hr class="rotatedLine" />
        <button @click="deleteBooking(booking.id)" class="cancel">
          Cancel
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Bookings",
  data() {
    return {
      bookings: {
        from: null,
        to: null,
        totalPrice: null,
      },
      hasReview: false,
      linkedReviewID: null,
    };
  },
  methods: {
    gotoRiadsPage() {
      this.$router.push("/Explore");
    },

    deleteBooking(id) {
      axios
        .get(`http://localhost:8000/api/booking/${id}/review`)
        .then((response) => {
          this.hasReview = true;
          this.linkedReviewID = response.data.id;
          console.log(this.hasReview);
          console.log(this.linkedReviewID);
        });

      if (this.hasReview) {
        axios
          .delete(`http://localhost:8000/api/reviews/${this.linkedReviewID}`)
          .then((response) => {
            axios
              .delete(`http://localhost:8000/api/bookings/${id}`)
              .then((response) => {
                console.log(response);
                this.$router.push("/");
              });
          });
      } else {
        axios
          .delete(`http://localhost:8000/api/bookings/${id}`)
          .then((response) => {
            console.log(id);
            console.log(response);
            this.$router.push("/");
          });
      }
    },
  },
  created() {
    axios
      .get(`http://localhost:8000/api/user/${this.$route.params.id}/bookings`)
      .then((response) => {
        this.bookings = response.data;
        this.bookings.forEach((booking) => {
          axios
            .get(`http://localhost:8000/api/booking/${booking.id}/totalprice`)
            .then((response) => {
              booking.totalPrice = response.data;
            });
        });
        console.log(this.bookings);
      });
  },
};
</script>

<style scoped>
.bookings {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.bookingsHeader {
  font-family: luxia;
  font-weight: normal;
  font-size: 30px;
  color: #996515;
  letter-spacing: 2px;
}

.noBookingsYet {
  font-family: luxia;
  font-size: 20px;
  color: gray;
  margin-top: 40px;
  cursor: pointer;
}

.bookingsContainer {
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 90%;
  background-color: rgb(32, 32, 32);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0);
}

.booking {
  padding: 30px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  width: 90%;
  background-color: rgb(32, 32, 32);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0);
  margin: 30px 0;
}
.bookingDetail {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.bookingTexe {
  color: #996515;
  font-family: luxia;
  font-size: 20px;
}
.bookingValue {
  color: #996515;
  font-family: luxia;
  font-size: 27px;
}
.totalPrice {
  width: 35%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.price {
  color: #996515;
  font-family: luxia;
  font-size: 32px;
}
.rotatedLine {
  border: 1px solid #996515;
  transform: rotate(90deg);
  width: 50px;
}

.cancel {
  padding: 10px;
  font-family: luxia;
  color: #996515;
  background: rgb(29, 29, 29);
  border: 1px solid #996515;
  cursor: pointer;
}
</style>