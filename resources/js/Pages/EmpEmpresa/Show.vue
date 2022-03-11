<template>
  <app-layout title="Nova Empresa">
    <template #header>
      <h2 class="h4 font-weight-bold">
        {{ EmpEmpresaUm.emp_nom_empresa }}
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
              <h3><i class="bi bi-archive"></i> Arquivos</h3>
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
                <template #title> Criar pasta </template>
                <template #content>
                  <div class="col-md-12 mt-4">
                    <jet-label for="doc_num_documento" value="Nome da pasta" />
                    <jet-input
                      id="doc_num_documento"
                      type="text"
                      v-model="novoArquivoForm.doc_num_documento"
                    />

                    <small class="form-text text-danger">
                      {{ novoArquivoForm.errors.doc_num_documento }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="doc_id_tdo" value="Tipo de documento" />
                    <select
                      id="doc_id_tdo"
                      v-model="novoArquivoForm.doc_id_tdo"
                      class="form-select"
                    >
                      <option selected>Escolha uma opção...</option>
                      <option
                        v-for="tipo in TdoTipoDocumento"
                        :key="tipo.tdo_id_tdo"
                        :value="tipo.tdo_id_tdo"
                      >
                        {{ tipo.tdo_nom_tipo_documento }}
                      </option>
                    </select>

                    <small class="form-text text-danger">
                      {{ novoArquivoForm.errors.doc_id_tdo }}
                    </small>
                  </div>

                  <div class="col-md-12">
                    <small class="form-text text-danger">
                      {{ novoArquivoForm.errors.doc_id_emp }}
                    </small>
                  </div>

                  <jet-button
                    @click="storeFolder"
                    class="mt-3"
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

          <div
            v-for="documento in EmpEmpresaUm.doc_documento"
            :key="documento.doc_id_doc"
            class="row mb-2"
          >
            <div class="col-8">
              <i class="bi bi-folder"></i> {{ documento.doc_num_documento }} -
              {{ documento.tdo_tipo_documento.tdo_nom_tipo_documento }}
            </div>
            <div class="col-4 text-end">
              <img-upload v-bind:documento="documento" />
              <button
                @click="destroyFolder(documento.doc_id_doc)"
                class="btn-icon btn-danger"
              >
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
              <h3><i class="bi bi-geo-alt"></i> Endereços</h3>
            </div>
            <div class="col-4 text-end">
              <button
                class="btn"
                data-bs-toggle="modal"
                :data-bs-target="'#novoModalEndereco'"
              >
                <h3>+</h3>
              </button>

              <jet-modal-dialog :id="'novoModalEndereco'">
                <template #title> Criar novo endereço </template>
                <template #content>
                  <div class="col-md-12 mt-4">
                    <jet-label for="log_num_cep" value="Digite o CEP" />
                    <jet-input
                      id="log_num_cep"
                      @change="buscaCep"
                      type="text"
                      v-model="novoEndForm.log_num_cep"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.log_num_cep }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="log_nom_logradouro" value="Logradouro" />
                    <jet-input
                      id="log_nom_logradouro"
                      type="text"
                      v-model="novoEndForm.log_nom_logradouro"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.log_nom_logradouro }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="bai_nom_bairro" value="Bairro" />
                    <jet-input
                      id="bai_nom_bairro"
                      type="text"
                      v-model="novoEndForm.bai_nom_bairro"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.bai_nom_bairro }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="end_nom_complemento" value="Complemento" />
                    <jet-input
                      id="end_nom_complemento"
                      type="text"
                      v-model="novoEndForm.end_nom_complemento"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.end_nom_complemento }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="end_num_numero" value="Numero" />
                    <jet-input
                      id="end_num_numero"
                      type="text"
                      v-model="novoEndForm.end_num_numero"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.end_num_numero }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="end_num_lat" value="Latitude" />
                    <jet-input
                      id="end_num_lat"
                      type="text"
                      v-model="novoEndForm.end_num_lat"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.end_num_lat }}
                    </small>
                  </div>

                  <div class="col-md-12 mt-4">
                    <jet-label for="end_num_long" value="Longitude" />
                    <jet-input
                      id="end_num_long"
                      type="text"
                      v-model="novoEndForm.end_num_long"
                    />

                    <small class="form-text text-danger">
                      {{ novoEndForm.errors.end_num_long }}
                    </small>
                  </div>

                  <jet-button
                    @click="storeFolder"
                    class="mt-3"
                    :class="novoEndForm.processing"
                    :disabled="novoEndForm.processing"
                  >
                    Salvar
                    <div
                      v-show="novoEndForm.processing"
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
          <end-endereco />
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
import ImgUpload from "./Upload.vue";
import EndEndereco from "./Endereco.vue";

export default defineComponent({
  components: {
    AppLayout,
    JetButton,
    JetModalDialog,
    JetInput,
    JetLabel,
    ImgUpload,
    EndEndereco,
  },
  props: [],
  methods: {
    destroyFolder(id) {
      this.$inertia.put("/documento/deletar/" + id),
        {
          preserveScroll: true,
        };
    },
    storeFolder() {
      this.novoArquivoForm.post(route("documento.criar"), {
        erroBag: "DocDocumentoRequest",
        preserveScroll: true,
        _method: "put",
        onSuccess: () => {
          this.resetArquivo();
        },
      });
    },
    storeEnd() {
      this.novoArquivoForm.post(route("endereco.criar"), {
        erroBag: "EndEnderecoRequest",
        preserveScroll: true,
        _method: "put",
        onSuccess: () => {
          this.resetEnd;
        },
      });
    },
    resetArquivo() {
      this.novoArquivoForm.doc_num_documento = "";
      this.novoArquivoForm.doc_id_tdo = "";
    },
    resetEnd() {
      this.novoEndForm.end_num_numero = "";
      this.novoEndForm.end_nom_complemento = "";
      this.novoEndForm.end_num_lat = "";
      this.novoEndForm.end_num_long = "";
      this.novoEndForm.end_id_emp = "";
      this.novoEndForm.bai_nom_bairro = "";
      this.novoEndForm.log_nom_logradouro = "";
      this.novoEndForm.log_num_cep = "";
    },
    buscaCep() {
      var url =
        "https://viacep.com.br/ws/" + this.novoEndForm.log_num_cep + "/json/";
      axios
        .get(url)
        .then((resp) => {
          var data = resp.data;
          console.log(data);
          if (!data.erro) {
            this.novoEndForm.log_nom_logradouro = data.logradouro;
            this.novoEndForm.bai_nom_bairro = data.bairro;
            this.novoEndForm.end_nom_complemento = data.complemento;
            this.buscaLatLog();
          } else {
            console.error(error);
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    buscaLatLog() {
      var url =
        "https://maps.googleapis.com/maps/api/geocode/json?address=" +
        this.novoEndForm.log_num_cep +
        "&key=AIzaSyAxCTIgDEMja1Xda05djDewVM6hZae5zTI";
      axios
        .get(url)
        .then((resp) => {
          var data = resp.data;
          if (data.status == "OK") {
            var latlog = data.results[0].geometry.bounds.northeast;
            this.novoEndForm.end_num_lat = latlog.lat;
            this.novoEndForm.end_num_long = latlog.lng;
          } else {
            console.error(data.status);
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  props: ["EmpEmpresaUm", "TdoTipoDocumento"],
  data() {
    return {
      novoArquivoForm: this.$inertia.form({
        doc_num_documento: "",
        doc_id_tdo: "",
        doc_id_emp: this.EmpEmpresaUm.emp_id_emp,
      }),
      novoEndForm: this.$inertia.form({
        end_num_numero: "",
        end_nom_complemento: "",
        end_num_lat: "",
        end_num_long: "",
        end_id_emp: "",
        bai_nom_bairro: "",
        log_nom_logradouro: "",
        log_num_cep: "",
      }),
    };
  },
});
</script>