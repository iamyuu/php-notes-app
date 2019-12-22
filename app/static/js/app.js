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
  $.getJSON(`/api/single.php?id=${id}`, ({ data }) => {
    setForm(data)
    $('.modal').modal('open')
  })
}
