<template>
  <div class="row">
    <div class="col-4">
      <form @submit.prevent="submit">
        <div class="form-control">
          <label for="player" class="form-label">Number of Players</label>
          <input type="number" class="form-control" id="player"  min="0" v-model="fields.player">
          <div class="invalid-feedback" v-if="error">
            {{error}}
          </div>
          <div class="col-4 mt-2">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-8">
       <span v-for="(list, index) in draw">
        <span>{{list}}</span><span v-if="index+1 < draw.length && index+1 < 52">, </span>
      </span>
    </div>
  </div>

</template>

<script>
export default {
  data () {
    return {
      fields: {
        player: this.player,
      },
      error: '',
      draw: ''
    }
  },

  methods: {
    submit() {
      this.error = '';
      axios.post('/submit', this.fields).then(response => {
        if(response.data.error) {
          this.error = response.data.message
        } else {
          this.draw = response.data.data
        }
      }).catch(error => {
        console.log('error')
        if (error.response.status === 422) {
          console.log('error')
        }
      });
    },
  }
}
</script>

<style scoped>
  .invalid-feedback {
    display: block;
  }
</style>