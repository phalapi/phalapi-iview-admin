import axios from '@/libs/api.request'

export const login = ({ userName, password }) => {
  const data = {
    userName,
    password
  }
  return axios.request({
    url: 'api/User.Login',
    data,
    method: 'post'
  })
}

export const getUserInfo = (token) => {
  return axios.request({
    url: 'api/User.GetInfo',
    params: {
      token
    },
    method: 'get'
  })
}

export const logout = (token) => {
  return axios.request({
    url: 'api/User.Logout',
    method: 'post'
  })
}

export const getUnreadCount = () => {
  return axios.request({
    url: 'api/Message.Count',
    method: 'get'
  })
}

export const getMessage = () => {
  return axios.request({
    url: 'api/Message.InitMsg',
    method: 'get'
  })
}

export const getContentByMsgId = msg_id => {
  return axios.request({
    url: 'api/Message.Content',
    method: 'get',
    params: {
      msg_id
    }
  })
}

export const hasRead = msg_id => {
  return axios.request({
    url: 'api/Message.HasRead',
    method: 'post',
    data: {
      msg_id
    }
  })
}

export const removeReaded = msg_id => {
  return axios.request({
    url: 'api/Message.RemoveReaded',
    method: 'post',
    data: {
      msg_id
    }
  })
}

export const restoreTrash = msg_id => {
  return axios.request({
    url: 'api/Message.Restore',
    method: 'post',
    data: {
      msg_id
    }
  })
}
