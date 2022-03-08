<template>
  <jet-action-message :on="form.recentlySuccessful">
    Cliente criado
  </jet-action-message>
  <jet-form-section @submit="store">
    <template #title> Criar novo cliente </template>

    <template #form>
      <div class="col-md-12 mt-4">
        <jet-label for="emp_nom_empresa" value="Nome da empresa" />
        <jet-input
          id="emp_nom_empresa"
          type="text"
          v-model="form.emp_nom_empresa"
        />

        <small class="form-text text-danger">
          {{ form.errors.emp_nom_empresa }}
        </small>
      </div>

      <div class="col-md-12 mt-4">
        <jet-label for="emp_dti_atividade" value="Data inicio das atividades" />
        <jet-input
          id="emp_dti_atividade"
          type="date"
          v-model="form.emp_dti_atividade"
        />

        <small class="form-text text-danger">
          {{ form.errors.emp_dti_atividade }}
        </small>
      </div>
    </template>

    <template #actions>
      <jet-button :class="form.processing" :disabled="form.processing">
        Salvar
        <div
          v-show="form.processing"
          class="spinner-border spinner-border-sm"
          role="status"
        >
          <span class="visually-hidden"></span>
        </div>
      </jet-button>

      <jet-button @click="$emit('voltaParaLista')"> voltar </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import { defineComponent } from "vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetActionMessage from "@/Jetstream/ActionMessage.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

export default defineComponent({
  components: {
    JetButton,
    JetInput,
    JetInputError,
    JetLabel,
    JetActionMessage,
    JetValidationErrors,
    JetFormSection,
  },
  props: [],
  data() {
    return {
      form: this.$inertia.form({
        emp_nom_empresa: "",
        emp_dti_atividade: "",
      }),
    };
  },
  methods: {
    store() {
      this.form.post(route("empresa.store"), {
        erroBag: "EmpEmpresaRequest",
        preserveScroll: true,
        onSuccess: () => {
          this.$emit("voltaParaLista");
          this.reset();
        },
      });
    },
    reset() {
      this.form.emp_nom_empresa = "";
      this.emp_dti_atividade = "";
    },
  },
});
</script>