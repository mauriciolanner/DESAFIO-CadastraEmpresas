<template>
  <div class="row">
    <div class="col-8">
      <div class="row">
        <div class="col-md-12">
          Rua Armando Novais Silveira n3 - São Cristóvão - Salvador Bahia
        </div>
        <div class="col-md-12">CEP 41510-787</div>
        <div class="col-md-12">
          <div v-on:load="carregaMaps(-12.9071316, -38.3677921)">
            <div id="map_canvas" style="width: 500px; height: 200px"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4 text-end">
      <button class="btn-icon btn-success">
        <i class="bi bi-pencil-square"></i>
      </button>
      <button class="btn-icon btn-danger">
        <i class="bi bi-trash"></i>
      </button>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  components: {},
  props: ["endereco"],
  methods: {
    carregaMaps() {
      var mapOptions = {
        center: new google.maps.LatLng(this.lat, this.long),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
      };
      var map = new google.maps.Map(
        document.getElementById("map_canvas"),
        mapOptions
      );
      var ponto = new google.maps.LatLng(this.lat, this.long);
      var marker = new google.maps.Marker({
        position: ponto,
        map: map,
      });
    },
  },
  mounted() {
    this.$nextTick(() => {
      this.carregaMaps();
    });
  },
  data() {
    return {
      lat: "-12.9071316",
      long: "-38.3677921",
    };
  },
});
</script>
