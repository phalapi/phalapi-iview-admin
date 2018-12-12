<template>
  <div>
    <Row :gutter="20">
      <i-col span="12">
        <Card title="π框架 - PhalApi交流群(已满)" shadow>
          <img class="qq-group-img" :src="qqFans" alt="">
          <p class="qq-group-intro">如果有任何技术问题，欢迎随时来一起交流！</p>
        </Card>
      </i-col>
      <i-col span="12">
        <Card title="π框架 - PhalApi交流群②" shadow>
          <img class="qq-group-img" :src="qqFans2" alt="">
          <p class="qq-group-intro">如果有任何技术问题，欢迎随时来一起交流！</p>
        </Card>
      </i-col>
    </Row>
  </div>
</template>

<script>
import qqFans from '@/assets/images/qq-group1.jpg'
import qqFans2 from '@/assets/images/qq-group2.jpg'
export default {
  name: 'join_page',
  data () {
    return {
      qqFans,
      qqFans2
    }
  }
}
</script>

<style>
.qq-group-img{
  display: block;
  margin: 0 auto;
  width: 240px;
}
.qq-group-intro{
  padding: 20px;
  font-size: 16px;
}
</style>
