$(document).ready(() => {
  $('.modal').modal()
  $('select').formSelect()
})

const setForm = ({ id, title, note, color }) => {
  $('#id').val(id)
  $('#note').val(note)
  $('#title').val(title)
  $('#color').val(color).change() // fail :confused:
  // $('#color').val(color).trigger("change") // fail :confused:
  // $('#color').val(color).prop('selected', true) // fail :confused:
}

const add = () => {
  setForm({})
  $('.modal').modal('open')
}

const show = id => {
  $.getJSON(`/actions/get.php?id=${id}`, ({ data }) => {
    setForm(data)
    $('.modal').modal('open')
  })
}

const remove = (id, title) => {
  const answer = confirm(`Are you sure to delete ${title}?`)

  if (answer) {
    $('.form-delete-id').val(id)
    $('.delete-form').submit()
  }
}
