<template>
  <div class="row mb-3">
    <div class="col-md-2">
      <jet-button
        v-on:click="criarNovo = true"
        @click="$emit('voltaParaLista')"
      >
        criar novo <i class="bi bi-plus-lg"></i>
      </jet-button>
    </div>
    <div class="col-md-10">
      <jet-input-search
        id="buscar"
        type="text"
        v-model="buscar"
        @keyup="search"
        placeholder="Buscar..."
      />
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card-body bg-white shadow-sm border-bottom rounded-top">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nome</th>
              <th scope="col">Atividade inicio</th>
              <th scope="col">Atividade fim</th>
              <th scope="col">Especial</th>
              <th scope="col" class="text-end">Opções</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="empresa in EmpEmpresa" :key="empresa.emp_id_emp">
              <th scope="row">{{ empresa.emp_id_emp }}</th>
              <td>{{ empresa.emp_nom_empresa }}</td>
              <td>{{ empresa.emp_dti_atividade }}</td>
              <td>{{ empresa.emp_dtf_atividade }}</td>
              <td>
                <button class="btn" @click="updateSpecial(empresa.emp_id_emp)">
                  <i
                    v-if="empresa.emp_especial == 1"
                    class="bi bi-star-fill star-ico"
                  ></i>
                  <i v-else class="bi bi-star star-ico"></i>
                </button>
              </td>
              <td class="text-end">
                <a :href="'/empresa/' + empresa.emp_id_emp">
                  <button class="btn-icon btn-info">
                    <i class="bi bi-eye"></i>
                  </button>
                </a>

                <edit-form :empEmpresa="empresa" />

                <button
                  class="btn-icon btn-danger"
                  @click="destroy(empresa.emp_id_emp)"
                >
                  <i class="bi bi-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInputSearch from "@/Jetstream/InputSearch.vue";
import EditForm from "./Edit.vue";
import ShowPerfil from "./Show.vue";

export default defineComponent({
  components: {
    JetButton,
    JetInputSearch,
    EditForm,
    ShowPerfil,
  },
  emits: ["voltaParaLista"],
  props: ["EmpEmpresa"],
  methods: {
    search() {
      this.$inertia.get(
        "empresas",
        { buscar: this.buscar },
        { preserveState: true }
      );
    },
    destroy(id) {
      this.$inertia.put("/empresa/deleta/" + id),
        {
          erroBag: "EmpEmpresaRequest",
          preserveScroll: true,
        };
    },
    updateSpecial(id) {
      this.$inertia.put("/empresa/edita/especial/" + id);
    },
  },
  data() {
    return {
      buscar: "",
    };
  },
});
</script>
