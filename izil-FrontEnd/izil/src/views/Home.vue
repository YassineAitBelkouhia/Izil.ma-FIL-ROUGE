<template>
  <div class="home">
    <div class="sectionOne">
      <div class="sectionOneText">
        <h1 class="sectionOneHeader">
          Vintage <br />
          Moroccan <br />
          Vibes.
        </h1>
        <p class="headerParagraph">
          With its beautiful, varied and vintage architecture. <br />
          Morocco never fails to impress ! <br />
          Experience eccentric Moroccan Vibes with our collection of RIADS
        </p>
        <div class="homeButtons">
          <div @click="scrollDown" class="homePageButton">READ MORE</div>
          <div @click="pushRoute('Explore')" class="homePageButton">
            EXPLORE
          </div>
        </div>
      </div>
    </div>
    <div class="sectionTwo">
      <img class="sectionTwoImage" src="../assets/home--.jpg" alt="" />
      <div class="sectionTwoText">
        <h1 class="sectionTwoHeader">
          Stay. <br />
          Dine. <br />
          Enjoy.
        </h1>
        <p class="sectionTwoParagraph">
          Morocco is the third welcoming country in the world According to the
          World Economics Forum investigation measuring the quality of being
          warm and welcoming to strangers. <br />
          The survey was done in 2013 and relied mainly upon nations attitude
          towards tourists. <br />
          Only 20 countries amoung 140 were marked
          <span>Very good welcoming</span> <br />
          Traveling is almost the same as rebirth, you will not only face new
          challenging situations, but don't understand others conversations as
          well. <br />
          The best gift you may receive is cheerful eyes and welcoming hearts
          all around you. <br />
        </p>
      </div>
    </div>
    <div class="sectionThree">
      <img class="sectionThreeImage" src="../assets/home-.jpg" alt="" />
      <div class="sectionThreeText">
        <h1 class="sectionThreeHeader">
          On <br />
          Moroccan <br />
          Architecture.
        </h1>
        <p class="sectionThreeParagraph">
          Morocco has a unique location and therefore has been influenced by
          many cultures throughout time which can be reflected in the
          architecture. Over the centuries the country had been formed by a
          mixture of European colonisers, Arabic neighbours and African tribes
          traveling through the country all these influences have created a rich
          cultural mix which is unlike any other and is reflected in the
          countries architecture and the Moroccan people.In Modern Morocco we
          can see many different architectural designs but the strongest
          influence throughout is Islam where the décor and building guidelines
          have been influenced, followed and have directed the construction and
          decoration of the buildings in many parts of Morocco for centuries.
          Hispano-Moorish architecture (architecture characteristic of North
          Africa and the Iberian Peninsula) also took roots in Morocco during
          the Almoravid dynasty. Thus a mixture of these two architectural
          styles can be detected throughout many of the cities.The many diverse
          architectural styles and elements can become somewhat overwhelming; we
          can take you on a short journey describing the variety of elements.
        </p>
      </div>
    </div>
    <div class="logoFooter">
      <img class="Izil" src="../assets/logo-.png" alt="" />
      <div class="footerSocial">
        <img class="footerSocialIcons" src="../assets/facebook.png" alt="" />
        <img class="footerSocialIcons" src="../assets/instagram.png" alt="" />
        <img class="footerSocialIcons" src="../assets/twitter.png" alt="" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  methods: {
    pushRoute(Route) {
      this.$router.push(Route);
    },
    scrollDown() {
      window.scrollTo(0, 1900);
    },
  },
};
</script>

<style scoped>
.homeButtons {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.homePageButton {
  cursor: pointer;
  padding: 0 20px;
  font-family: luxia;
  font-size: 20px;
  letter-spacing: 1px;
  color: #996515;
  border-left: #996515 1px solid;
  background: transparent;
  outline: none;
  transition: all 0.4s ease;
}
.explor {
  background: #996515;
  transition: all 0.3s ease;
  color: rgb(29, 29, 29);
}
.homePageButton:hover {
  letter-spacing: 4px;
  transition: all 0.4s ease;
}

.sectionOne {
  background-image: url("../assets/background----.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  padding: 0 18vw;
}

.sectionOneText {
  width: 300px;
  margin: auto 0;
  padding-left: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 600px;
  gap: 30px;
  border-left: #996515 solid 2px;
}

.sectionOneHeader {
  font-size: 80px;
  font-weight: normal;

  font-family: Voga;
  letter-spacing: 3px;
  color: #996515;
}

.headerParagraph {
  font-size: 25px;
  font-family: luxia;
  color: #a9a9a9;
  color: gray;
}

.sectionTwo {
  display: flex;
  width: 80%;
  flex-direction: row;
  justify-content: space-around;
  margin: 200px auto;
}

.sectionThree {
  display: flex;
  background-image: url("../assets/background----.jpg");
  background-attachment: fixed;
  background-size: cover;
  background-repeat: no-repeat;
  flex-direction: row-reverse;
  justify-content: space-around;
  margin: 300px auto 100px auto;
  padding: 100px;
}

.sectionTwoImage {
  width: 40%;
}

.sectionThreeImage {
  width: 40%;
}

.sectionTwoText {
  width: 40%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 30px;
  border-left: #996515 2px solid;
}
.sectionThreeText {
  width: 40%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 30px;
  border-left: #996515 2px solid;
}

.sectionTwoHeader {
  font-family: Voga;
  font-weight: normal;
  font-size: 80px;
  letter-spacing: 2px;
  color: #996515;
  padding-left: 20px;
}
.sectionTwoParagraph {
  padding-left: 20px;
  font-size: 25px;
  font-family: luxia;
  color: gray;
}
.sectionThreeHeader {
  font-family: voga;
  font-weight: normal;

  font-size: 70px;
  letter-spacing: 2px;
  color: #996515;
  padding-left: 20px;
}
.sectionThreeParagraph {
  padding-left: 20px;
  font-size: 22px;
  font-family: luxia;
  color: gray;
}
.logoFooter {
  width: fit-content;
  margin: 0 auto;
}
.Izil {
  width: 180px;
}

.footerSocial {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  gap: 5px;
  margin: 20px auto;
  align-self: center;
}
.footerSocialIcons {
  width: 20px;
}
</style>
