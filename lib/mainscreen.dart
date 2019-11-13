import 'package:flutter/material.dart';
import 'package:flutter/services.dart';


class MainScreen extends StatefulWidget {
  final String email;

 const MainScreen({Key key,this.email}) : super(key: key);

  @override
  _MainScreenState createState() => _MainScreenState();
}

class _MainScreenState extends State<MainScreen> {
 

 int currentTabIndex = 0;

 @override
  void initState() {
    super.initState();
    
  }

  String $pagetitle = "My Lorry";

  onTapped(int index) {
    setState(() {
      currentTabIndex = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    SystemChrome.setEnabledSystemUIOverlays([]);
    return Scaffold(
     
      bottomNavigationBar: BottomNavigationBar(
        onTap: onTapped,
        currentIndex: currentTabIndex,
        //backgroundColor: Colors.blueGrey,
        type: BottomNavigationBarType.fixed ,
        
        items: [
          BottomNavigationBarItem(
            icon: Icon(Icons.search,color: Color.fromRGBO(255, 0, 0, 1)),
            title: Text("Lorry"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.event,color: Color.fromRGBO(255, 0, 0, 1)),
            title: Text("My Lorry"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.mail,color: Color.fromRGBO(255, 0, 0, 1)),
            title: Text("Messages",style: TextStyle(color: Colors.black),),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person,color: Color.fromRGBO(255, 0, 0, 1)),
            title: Text("Profile"),
          )
        ],
      ),
    );
  }

  
}