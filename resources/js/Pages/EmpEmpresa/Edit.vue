<template>
  <button
    class="btn-icon btn-success"
    data-bs-toggle="modal"
    :data-bs-target="'#editModal' + updateForm.emp_id_emp"
  >
    <i class="bi bi-pencil-square"></i>
  </button>

  <jet-modal-dialog :show="modalAbre" :id="'editModal' + updateForm.emp_id_emp">
    <template #title> Editar Empresa </template>
    <template #content>
      <div class="col-md-12 mt-4">
        <jet-label for="emp_nom_empresa" value="Nome da empresa" />
        <jet-input
          id="emp_nom_empresa"
          type="text"
          v-model="updateForm.emp_nom_empresa"
        />

        <small class="form-text text-danger">
          {{ updateForm.errors.emp_nom_empresa }}
        </small>
      </div>

      <div class="col-md-12 mt-4">
        <jet-label for="emp_dti_atividade" value="Data inicio das atividades" />
        <jet-input
          id="emp_dti_atividade"
          type="date"
          v-model="updateForm.emp_dti_atividade"
        />

        <small class="form-text text-danger">
          {{ updateForm.errors.emp_dti_atividade }}
        </small>
      </div>

      <div class="col-md-12 mt-4">
        <jet-label for="emp_dtf_atividade" value="Data fim das atividades" />
        <jet-input
          id="emp_dtf_atividade"
          type="date"
          v-model="updateForm.emp_dtf_atividade"
        />

        <small class="form-text text-danger">
          {{ updateForm.errors.emp_dtf_atividade }}
        </small>
      </div>

      <jet-button
        @click="update"
        :class="updateForm.processing"
        :disabled="updateForm.processing"
      >
        Salvar
        <div
          v-show="updateForm.processing"
          class="spinner-border spinner-border-sm"
          role="status"
        >
          <span class="visually-hidden"></span>
        </div>
      </jet-button>
    </template>
  </jet-modal-dialog>
</template>

<script>
import { defineComponent } from "vue";
import JetButton from "@/Jetstream/Button.vue";
import JetModalDialog from "@/Jetstream/DialogModal.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetActionMessage from "@/Jetstream/ActionMessage.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

export default defineComponent({
  components: {
    JetButton,
    JetModalDialog,
    JetInput,
    JetInputError,
    JetLabel,
    JetActionMessage,
    JetValidationErrors,
    JetFormSection,
    JetSecondaryButton,
  },
  props: ["empEmpresa"],
  methods: {},
  data() {
    return {
      updateForm: this.$inertia.form({
        emp_id_emp: this.empEmpresa.emp_id_emp,
        emp_nom_empresa: this.empEmpresa.emp_nom_empresa,
        emp_dti_atividade: this.empEmpresa.emp_dti_atividade,
        emp_dtf_atividade: this.empEmpresa.emp_dtf_atividade,
      }),
      modalAbre: false,
    };
  },
  methods: {
    update() {
      this.updateForm.put(route("empresa.edit"), this.emp_empresa),
        {
          erroBag: "EmpEmpresaRequest",
          preserveScroll: true,
        };
      console.log("editModal" + this.updateForm.emp_id_emp);
      this.$refs["editModal" + this.updateForm.emp_id_emp].hide();
    },
  },
});
</script>