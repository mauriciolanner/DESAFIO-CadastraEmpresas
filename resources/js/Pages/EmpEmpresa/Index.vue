<template>
  <app-layout title="Nova Empresa">
    <template #header>
      <h2 class="h4 font-weight-bold">Empresas</h2>
    </template>
    <div>
      <nova-empresa v-if="criarNovo" v-on:voltaParaLista="criaEmpNovo" />
      <div v-else>
        <lista-empresa
          v-on:voltaParaLista="criaEmpNovo"
          v-bind:EmpEmpresa="EmpEmpresa"
        />
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import NovaEmpresa from "./New";
import ListaEmpresa from "./List";

export default defineComponent({
  components: {
    AppLayout,
    NovaEmpresa,
    JetButton,
    ListaEmpresa,
  },
  props: [],
  methods: {
    criaEmpNovo() {
      this.criarNovo == false
        ? (this.criarNovo = true)
        : (this.criarNovo = false);
    },
  },
  props: ["EmpEmpresa"],
  data() {
    return {
      criarNovo: false,
    };
  },
});
</script>