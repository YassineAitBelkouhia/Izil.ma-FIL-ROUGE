<template>
  <div class="Loading">
    <h1>LOADING...</h1>
    <transition name="loadingTransition">
      <img class="moorStar" src="../assets/mooor.png" alt="" />
    </transition>
  </div>
</template>

<script>
export default {
  name: "Loading",
};
</script>

<style scoped>
.Loading {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 300px;
  height: 200px;
  gap: 10px;
}
@keyframes slideIn {
  from {
    transform: translateX(-100px);
  }

  to {
    transform: translateX(100px);
  }
}
.moorStar {
  width: 30px;
  animation: slideIn 1s ease infinite;
}
h1 {
  font-size: 20px;
  color: #996515;
  font-family: luxia;
  font-weight: normal;
  letter-spacing: 1px;
}
</style>