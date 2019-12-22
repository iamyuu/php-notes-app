$(document).ready(() => {
  $('.modal').modal()
})

const setForm = ({ id, title, note }) => {
  $('#id').val(id)
  $('#note').val(note)
  $('#title').val(title)
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
