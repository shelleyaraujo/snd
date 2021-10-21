<style>

.cnt-posts {
  display: flex;
  align-content: flex-start;
  align-items: stretch;
  justify-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;  background-color: transparent;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  text-align: left;
  padding: 0 15px;
}

.cnt-posts > div:nth-child(1) {
  width: 100%;
}

.cnt-posts > div:nth-child(2) {
  width: 100%;
}

.cnt-posts li {
  list-style: none;
}

.cnt-posts p a {
  color: #222;
}

.posts-home ul {
 display: -webkit-box;
 display: -moz-box;
 display: -ms-flexbox;
 display: -webkit-flex;
 display: flex;  
 align-items: stretch;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1024px;
 margin: 0 auto;
}

.posts-home li {
  width: 33.33%;
  padding: 15px;
  list-style: none;
  margin: 0;
}



@media (min-width: 400px) {



  .cnt-posts > div:nth-child(1) {
    width: 80%;
    padding-right: 20px;
  }

  .cnt-posts > div:nth-child(2) {
    width: 20%;
    border-left: 1px solid silver;
    padding-left: 20px;
  }

}

</style>
