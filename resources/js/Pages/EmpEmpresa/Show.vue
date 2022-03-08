<template>
  <app-layout title="Nova Empresa">
    <template #header>
      <h2 class="h4 font-weight-bold">
        {{ this.EmpEmpresaUm.emp_nom_empresa }}
        <i
          v-if="EmpEmpresaUm.emp_especial == 1"
          class="bi bi-star-fill star-ico"
        ></i>
        <i v-else class="bi bi-star star-ico"></i>
      </h2>
    </template>
    <div class="row">
      <div class="col-md-12">
        <div class="card-body shadow-sm bg-white border-bottom rounded-top">
          <strong>Atividade inicio:</strong>
          {{ this.EmpEmpresaUm.emp_dti_atividade }}<br />
          <strong>Atividade fim:</strong>
          {{ this.EmpEmpresaUm.emp_dtf_atividade }}<br />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div
          class="card-body mt-3 shadow-sm bg-white border-bottom rounded-top"
        >
          <div class="row">
            <div class="col-8">
              <h3>Documentos</h3>
            </div>
            <div class="col-4 text-end">
              <button
                class="btn"
                data-bs-toggle="modal"
                :data-bs-target="'#novoModalDocumento'"
              >
                <h3>+</h3>
              </button>
              <jet-modal-dialog :id="'novoModalDocumento'">
                <template #title> Enviar documento </template>
                <template #content>
                  <div class="col-md-12 mt-4">
                    <jet-label for="imd_nom_arquivo" value="Nome do arquivo" />
                    <jet-input
                      id="imd_nom_arquivo"
                      type="text"
                      v-model="novoArquivoForm.imd_nom_arquivo"
                    />

                    <small class="form-text text-danger">
                      {{ novoArquivoForm.errors.imd_nom_arquivo }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label
                      for="emp_dti_atividade"
                      value="Data inicio das atividades"
                    />
                    <jet-input
                      id="emp_dti_atividade"
                      type="date"
                      v-model="novoArquivoForm.emp_dti_atividade"
                    />

                    <small class="form-text text-danger">
                      {{ novoArquivoForm.errors.emp_dti_atividade }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label
                      for="emp_dtf_atividade"
                      value="Data fim das atividades"
                    />
                    <jet-input
                      id="emp_dtf_atividade"
                      type="date"
                      v-model="novoArquivoForm.emp_dtf_atividade"
                    />

                    <small class="form-text text-danger">
                      {{ novoArquivoForm.errors.emp_dtf_atividade }}
                    </small>
                  </div>

                  <jet-button
                    @click="insertDoc"
                    :class="novoArquivoForm.processing"
                    :disabled="novoArquivoForm.processing"
                  >
                    Salvar
                    <div
                      v-show="novoArquivoForm.processing"
                      class="spinner-border spinner-border-sm"
                      role="status"
                    >
                      <span class="visually-hidden"></span>
                    </div>
                  </jet-button>
                </template>
              </jet-modal-dialog>
            </div>
          </div>
          <div class="row">
            <div class="col-8">Título do documento</div>
            <div class="col-4 text-end">
              <button class="btn-icon btn-info">
                <i class="bi bi-eye"></i>
              </button>
              <button class="btn-icon btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div
          class="card-body mt-3 shadow-sm bg-white border-bottom rounded-top"
        >
          <div class="row">
            <div class="col-8">
              <h3>Endereços</h3>
            </div>
            <div class="col-4 text-end">
              <button class="btn"><h3>+</h3></button>
            </div>
          </div>
          <div class="row">
            <div class="col-8">Título do documento</div>
            <div class="col-4 text-end">
              <button class="btn-icon btn-info">
                <i class="bi bi-eye"></i>
              </button>
              <button class="btn-icon btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetModalDialog from "@/Jetstream/DialogModal.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";

export default defineComponent({
  components: {
    AppLayout,
    JetButton,
    JetModalDialog,
    JetInput,
    JetLabel,
  },
  props: [],
  methods: {
    insertDoc() {},
  },
  props: ["EmpEmpresaUm"],
  data() {
    return {
      novoArquivoForm: this.$inertia.form({
        doc_num_documento: "",
        doc_dat_cadastro: "",
        doc_id_tdo: "",
        doc_id_emp: "",
      }),
    };
  },
});
</script>