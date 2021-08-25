<template>
  <div class="contact">
    <div class="contactConainer">
      <img class="contactLogo" src="../assets/logo-.png" alt="" />
      <hr class="contactLine" />
      <div class="contactInfo">
        <div class="contactInfoItem">
          <img class="mediaIcon" src="../assets/facebook.png" alt="" />
          <p class="mediaText">Facebook</p>
        </div>
        <div class="contactInfoItem">
          <img class="mediaIcon" src="../assets/instagram.png" alt="" />
          <p class="mediaText">Instagram</p>
        </div>
        <div class="contactInfoItem">
          <img class="mediaIcon" src="../assets/twitter.png" alt="" />
          <p class="mediaText">Twitter</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.contact {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.contactConainer {
  /* height: 700px; */
  padding: 100px;
  background-color: rgb(32, 32, 32);
  display: flex;
  gap: 100px;
  flex-direction: row;
  justify-content: center;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  width: 60%;
}
.contactLogo {
  width: 200px;
}
.contactLine {
  color: #996515;
  border: 1px solid #996515;
}

.contactInfo {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 30px;
}
.mediaIcon {
  width: 30px;
}
.contactInfoItem {
  display: flex;
  flex-direction: row;
  gap: 20px;
  /* align-items: baseline; */
}

.mediaText {
  color: #996515;
  font-family: luxia;
  font-size: 20px;
}
</style>