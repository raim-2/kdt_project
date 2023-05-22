# Web Project
<https://earnestga3.cafe24.com/portfolio/>

## 프로젝트 설명
해당 프로젝트는 프로젝트 기반 프론트엔드 웹, 앱 SW 개발자 과정(KDT)을 수강하며 제작한 프로젝트 입니다. <br/>
프로젝트는 총 6가지 프로젝트로 구성됩니다.

+ 제작인원 : 1명 (기여도 100%)
+ 제작기간 : 6개월

+ 기업형 웹프로젝트 (PC형)
<https://earnestga3.cafe24.com/>
+ 기업형 모바일웹 프로젝트
<https://earnestga3.cafe24.com/mobile>
+ 반응형웹 프로젝트
<https://earnestga3.cafe24.com/media>
+ 부트스트랩(CSS UI 프레임워크) 프로젝트
<https://earnestga3.cafe24.com/bootstrap>
+ 워드프레스(CMS) 프로젝트
<https://earnestga3.cafe24.com/wordpress>
+ 뷰 SPA 프로젝트
<https://earnestga3.cafe24.com/vue>

## 프로젝트 스택

+ 언어 : HTML5, CSS3, JavaScript, PHP
+ 라이브러리 및 프레임워크 : jQuery, BootStrap, Vue
+ 데이터베이스 : MySQL
+ 기타 : WordPress

## 프로젝트
### 1. 기업형 웹프로젝트, 동아ST 기업형 PC

 + https://earnestga3.cafe24.com/
 + 기존 동아ST 웹사이트를 리뉴얼하여 제작한 PC형 웹사이트
 + 프로토타입 제작부터 상세 디자인, 웹표준과 웹접근성을 고려한 마크업과 동적 구현
 + MySQL과 PHP를 사용해 DB에 연결하고, 게시판과 로그인 관련 사이트를 구현한 풀스택 웹사이트.


#### 웹 접근성 / 웹표준
 + W3C 웹표준 통합 마크업 검사(html/css)를 이용 웹표준 검사 완료
 + kawah 프로그램 이용한 웹접근성 검사 완료
 + 리더기가 읽는 순서를 고려한 마크업 
 + heading 태그를 사용한 목차/아웃라인 구성 
 + 시맨틱 태그를 사용한 마크업

#### HTML / CSS / JavaScript /jQuery
 + float와 position 을 이용한 레이아웃 
 + 스티키 메뉴, 스크롤 스파이, 탭, 자동 롤링, 카운트 등 이벤트 구현 
    + ***[회사소개 - 주요연혁] [연구분야 - 연구활동] [정도경영 - 사회공헌, 환경경영]***
 + json과 ajax를 사용한 모달창 구현 ***[인덱스 - 신제품]***


#### PHP / MySQL
 + PHP 의 include 를 이용하여 header 와 footer를 분리
 + PHP 와 MySQL 을 사용해 회원가입 구현
   + ***[회원가입, 정보수정, 로그인 및 아이디/비밀번호 찾기]***
 + PHP 와 MySQL 을 사용해 게시판 구현 
    + 일반 게시판 ***[고객지원 - 공지사항]***
    + 이미지 게시판 ***[사업분야 - 제품검색]***
    + 이미지 + 댓글 게시판 ***[고객지원 - 동아위드]***


#### :pushpin: 느낀점
마크업 시 시맨틱 태그로 레이아웃을 구성하는 것이 <br>
웹접근성과 검색엔진 최적화 및 유지보수를 위해 중요하다는 점을 알게 된 프로젝트



### 2. 기업형 모바일웹 프로젝트, 동아ST 기업형 모바일 
 + https://earnestga3.cafe24.com/mobile
 + 제작했던 동아ST 웹사이트를 모바일화한 웹사이트
 + PC버전을 간략한 콘텐츠와 메뉴로 구성하였고, 터치 중심으로 이벤트 구현


#### 웹 접근성 / 웹표준
 + W3C 웹표준 통합 마크업 검사(html/css)를 이용 웹표준 검사 완료
 + kawah 프로그램 이용한 웹접근성 검사 완료 
 + heading 태그를 사용한 목차/아웃라인 구성 
 + 시맨틱 태그를 사용한 마크업
 + 다양한 모바일 디바이스 크로스 체크
    + 크롬 개발자도구 - 디바이스 툴바 사용

#### HTML / CSS / JavaScript /jQuery
 + flex와 grid를 사용해 레이아웃 구성
 + 자동 롤링, 탭,  카운트, 아코디언, 토글 등 이벤트 구현
    + ***[인덱스 - 메인비주얼, 신제품, 자주 묻는 질문, 패밀리 사이트]***
 + 플러그인 및 라이브러리 이용
    + Swiper 플러그인 - 터치 슬라이드 ***[인덱스 - 사업분야]***
    + 네이버 널리 차트 라이브러리 - 차트 ***[사업분야 - 전문의약품]***
 + json과 ajax를 사용한 모달 팝업 구현 ***[해외사업 - 수출품목]***

#### PHP / MySQL
 + PHP 의 include 를 이용하여 header 와 footer를 분리
 + PHP 와 MySQL 을 사용해 회원가입 구현
    + [회원가입, 정보수정, 로그인 및 아이디/비밀번호 찾기]


#### :pushpin: 느낀점
모바일 사이트 제작시 px 외에도 상대 단위(%, em, rem)를 이해하고,<br>
미디어쿼리를 사용한 해상도 서비스 처리 작업을 고민해봤던 프로젝트



### 3. 반응형웹 프로젝트, 모아나(애니메이션)
 + https://earnestga3.cafe24.com/media
 + 다양한 디바이스에 따라 UI가 변화하는 반응형 사이트 제작


#### 웹 접근성 / 웹표준
 + W3C 웹표준 통합 마크업 검사(html/css)를 이용 웹표준 검사 완료
 + kawah 프로그램 이용한 웹접근성 검사 완료 
 + heading 태그를 사용한 목차/아웃라인 구성 
 + 시맨틱 태그를 사용한 마크업
 + pc, mobile, tablet 사이즈에 맞춰 크로스 체크
     + 크롬 개발자도구 - 디바이스 툴바 사용

#### HTML / CSS / JavaScript /jQuery
 + grid와 미디어쿼리 사용으로 반응형 레이아웃 구성
 + CSS애니메이션 사용으로 동적 효과 구현
    + ***[인덱스 - Character] [메뉴 - Character]***
 + 플러그인 및 라이브러리 이용
    + Magnific Popup 플러그인 - 비디오 모달 팝업 ***[메뉴 - Trailer]***
    + Masonry플러그인 - 이미지 그리드 ***[메뉴 - Gallery]***
 + JavaScript와 jQuery를 사용해 audio 구현 / play(), pause() 사용
    + ***[메뉴 - Trailer - Sound Track]***


#### :pushpin: 느낀점
브라우저 창 조절에 따른 이미지 높이 처리 및 그리드, 미디어 쿼리를 활용해<br>
디바이스에 따라 UI가 변하는 반응형 사이트를 제작하는 법을 익혔던 프로젝트



### 4. 부트스트랩 반응형웹 프로젝트, 이솝(스킨케어 브랜드)
 + https://earnestga3.cafe24.com/bootstrap
 + 프레임워크인 부트스트랩을 활용한 반응형 원페이지 웹사이트 제작


#### 웹 접근성 / 웹표준
 + W3C 웹표준 통합 마크업 검사(html/css)를 이용 웹표준 검사 완료
 + kawah 프로그램 이용한 웹접근성 검사 완료 
 + heading 태그를 사용한 목차/아웃라인 구성 
 + 시맨틱 태그를 사용한 마크업
 + pc, mobile, tablet 사이즈에 맞춰 크로스 체크
     + 크롬 개발자도구 - 디바이스 툴바 사용

#### HTML / CSS / JavaScript /jQuery
 + 부트스트랩의 그리드 시스템을 사용해 반응형 레이아웃 구현
 + 부트스트랩을 이용한 모달, 아코디언, 탭 메뉴 구현
 + 플러그인 및 라이브러리 이용
    + Swiper 플러그인 - 자동 및 터치 슬라이드 ***[Aesop's best]***
 + JavaScript와 jQuery를 사용해 이미지 변경 및 높이 조절
    + 브라우저 창 조절 시 메인 비주얼 이미지 변경
    + 브라우저 창 조절 시 아코디언 이미지 높이 조절


#### :pushpin: 느낀점
부트스트랩과 활용해 시간을 단축했고,<br>
단점은 규칙과 기본 스타일 적용되어 있어 수정하기 번거로웠던 프로젝트



### 5. 워드프레스 반응형웹 프로젝트, 크로우캐년(주방용품 브랜드)
 + https://earnestga3.cafe24.com/wordpress
 + 대표적 오픈소스 콘텐츠 관리 시스템(CMS)인 워드프레스를 이용한 반응형 웹사이트 제작


#### 마크업 및 이벤트 구현
 + 워드프레스의 Sydney 테마와, elementor 플러그인을 사용해 반응형 웹사이트 구현


#### :pushpin:느낀점
워드프레스를 활용해 시간을 단축했으며, 이벤트 구현 시 자바스크립트 사용 없이도<br>
간단하게 처리가 가능해 유지보수가 편하다고 느낀 프로젝트



### 5. 뷰 프로젝트
 + https://earnestga3.cafe24.com/vue
 + 프레임워크 Vue.js 를 활용한 SPA 사이트 제작 및 공공 API 활용


#### HTML / CSS 
 + 시맨틱 태그를 사용한 마크업
 + Vuetify를 사용해 레이아웃 구성

#### 컴포넌트 구성
 + header, footer, visual, sub content를 컴포넌트로 구성해 재활용 및 유지보수를 고려

#### 뷰 라우터 활용
 + sub content(sub1, 2, 3)를 router를 이용해 페이지 연결
    + 라우터를 사용해 SPA(싱글 페이지 어플리케이션) 제작
    + 화면 전환을 매끄럽게 하여 사용자 경험 향상

#### 검색 기능 구현
 + 공공데이터포털의 API 활용 
 + v-model, v-show를 사용한 양방향 데이터 바인딩을 이용해 검색 기능 구현
 + v-for와 json 파일을 이용해 검색 리스트 출력


#### :pushpin: 느낀점
컴포넌트 사용으로 불필요한 코드의 재반복없이 컴포넌트를 재사용할 수 있는 점이 신기했고,<br>
 라우터 사용으로 비동기 방식의 처리가 가능하다는 것을 알 수 있었던 프로젝트


---
### 아쉬웠던 3가지
1. 다양한 프로젝트에도 불구하고, 자바스크립트 사용보다는 제이쿼리에 의존한 점
2. 6개의 프로젝트 모두 개인 프로젝트로 짧은 기간내에 디자인과 마크업, 동적구현까지 모두 하려다보니<br/>
원리를 이해하기보다는 직접적인 적용에만 의존했던 점
3. 직접 코드를 짜보기보다는 이미 짜있는 코드 사용이 더 많았음


