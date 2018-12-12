import Mock from 'mockjs'
import { login, logout, getUserInfo } from './login'
import { getTableData, getDragList, uploadImage } from './data'
import { getMessageInit, getContentByMsgId, hasRead, removeReaded, restoreTrash, messageCount } from './user'

// 配置Ajax请求延时，可用来测试网络延迟大时项目中一些效果
Mock.setup({
  timeout: 100
})

// 登录相关和获取用户信息
Mock.mock(/\/api\/User.Login/, login)
Mock.mock(/\/api\/User.GetInfo/, getUserInfo)
Mock.mock(/\/api\/User.Logout/, logout)
Mock.mock(/\/api\/Data.GetTableData/, getTableData)
Mock.mock(/\/api\/Data.GetDragList/, getDragList)
Mock.mock(/\/api\/Data.SaveErrorLogger/, 'success')
Mock.mock(/\/api\/Image.Upload/, uploadImage)
Mock.mock(/\/api\/Message.InitMsg/, getMessageInit)
Mock.mock(/\/api\/Message.Content/, getContentByMsgId)
Mock.mock(/\/api\/Message.HasRead/, hasRead)
Mock.mock(/\/api\/Message.RemoveReaded/, removeReaded)
Mock.mock(/\/api\/Message.Restore/, restoreTrash)
Mock.mock(/\/api\/Message.Count/, messageCount)

export default Mock
