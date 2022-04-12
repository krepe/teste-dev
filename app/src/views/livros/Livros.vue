<template>
  <v-row>
    <!-- basic -->
    {{ listLivros }}
    <v-col cols="12">
      <v-card>
        <v-card-title>Livros Cadastrados</v-card-title>
        <table-livros
          :livros="listLivros.data"
          :paginacao="listLivros.meta"
        />
      </v-card>
    </v-col>

    
  </v-row>
</template>

<script>
import TableLivros from './demos/Table.vue'

export default {
  components: {
    TableLivros,
  },

  data() {
    return {
      listLivros: {},
    }
  },

  created() {
    this.getLivros();
  },
  methods: {
    getLivros(){
      this.$axios.get(`livros`).then((response) => {
                    this.listLivros = response.data;
                }).finally(() => {
                    
                });
    },
  },
}
</script>
