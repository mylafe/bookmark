String.prototype.trim=function(){
      return this.replace(/(^\s*)|(\s*$)/g, "");
   }
   String.prototype.ltrim=function(){
      return this.replace(/(^\s*)/g,"");
   }
   String.prototype.rtrim=function(){
      return this.replace(/(\s*$)/g,"");
   }

   function trim(str){ //É¾³ý×óÓÒÁ½¶ËµÄ¿Õ¸ñ
       return str.replace(/(^\s*)|(\s*$)/g, "");
   }
   function ltrim(str){ //É¾³ý×ó±ßµÄ¿Õ¸ñ
       return str.replace(/(^\s*)/g,"");
   }
   function rtrim(str){ //É¾³ýÓÒ±ßµÄ¿Õ¸ñ
       return str.replace(/(\s*$)/g,"");
   }
 