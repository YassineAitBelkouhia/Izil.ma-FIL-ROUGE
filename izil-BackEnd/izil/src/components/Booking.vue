<template>
  <div class="Booking" @click.self="hideModal">
    <div class="modal">
      <p class="modalHeader">CHECK AVAILABILITY</p>
      <div class="formContainer">
        <div class="formControll">
          <label class="formLabel" for="from">FROM</label>
          <input v-model="dateData.from" type="date" placeholder="yyyy-mm-dd" />
        </div>
        <div class="formControll">
          <label class="formLabel" for="from">TO</label>
          <input v-model="dateData.to" type="date" />
        </div>
      </div>
      <button @click="check" class="modalButton" :disabled="isLoading">
        Check
      </button>
      <div class="resPonseArea">
        <Loading v-if="isLoading" />
        <p class="responseText" v-if="!isLoading && isResponseShown">
          Riad is {{ status ? "Not Available" : "Available" }}
        </p>
      </div>
      <button v-if="isBookingButtonShown" @click="book" class="modalButton">
        Book Now
      </button>
    </div>
  </div>
</template>

<script>
import Loading from "../components/Loading.vue";
import axios from "axios";
export default {
  name: "Booking",
  components: {
    Loading,
  },
  data() {
    return {
      dateData: {
        from: null,
        to: null,
      },
      isLoading: false,
      isResponseShown: false,
      isBookingButtonShown: false,
      status: null,
      booking_id: null,
      booked_riad: null,
    };
  },
  methods: {
    check() {
      this.isLoading = true;
      this.isResponseShown = true;
      axios
        .post(
          `http://localhost:8000/api/riads/${this.$route.params.id}/availability`,
          this.dateData
        )
        .then((response) => {
          this.status = response.data;
          this.isLoading = false;
          if (response.data == 0) {
            this.isBookingButtonShown = true;
          }
        });
    },

    book() {
      let bookingData = {
        from: this.dateData.from,
        to: this.dateData.to,
        riad_id: this.$route.params.id,
        user_id: localStorage.getItem("userId"),
      };
      axios
        .post("http://localhost:8000/api/bookings", bookingData)
        .then((response) => {
          this.booking_id = response.data.id;
          this.booked_riad = response.data.riad_id;
          localStorage.setItem("booking_id", this.booking_id);
          localStorage.setItem("booked_riad", this.booked_riad);
          console.log(localStorage.getItem("booking_id"));
          console.log(localStorage.getItem("booked_riad"));
          this.$router.push("/Explore");

          this.hideModal();
        });
    },

    hideModal() {
      this.$emit("hide");
    },
  },
};
</script>

<style  scoped>
.Booking {
  top: 0;
  left: 0;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #996415ed;
  width: 100%;
  height: 100vh;
}
.modal {
  width: 500px;
  padding: 40px;
  margin: auto;
  background: rgb(32, 32, 32);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.formContainer {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  margin: 30px 0;
}

.formControll {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.modalHeader {
  font-family: luxia;
  font-size: 18px;
  color: #996515;
}

.formLabel {
  font-family: luxia;
  font-size: 20px;
  color: #996515;
}

input {
  padding: 10px 0;
  background: transparent;
  border: none;
  border-bottom: 2px solid #996515;
  outline: none;
  width: 100%;
  font-family: luxia;
  font-size: 15px;
  color: #996515;
}

.modalButton {
  font-family: luxia;
  margin-top: 20px;
  color: #996515;
  cursor: pointer;
  width: 100%;
  background: rgb(29, 29, 29);
  border: 0;
  border-radius: 5px;
  font-size: 22px;
  padding: 10px 30px;
  text-decoration: none;
}

.modalButton:focus {
  outline: 0;
}

.modalButton:active {
  transform: scale(0.99);
}

.resPonseArea {
  display: flex;
  align-items: center;
  justify-content: center;
}
.responseText {
  font-family: luxia;
  font-size: 20px;
  color: gray;
  margin-top: 30px;
}
</style>