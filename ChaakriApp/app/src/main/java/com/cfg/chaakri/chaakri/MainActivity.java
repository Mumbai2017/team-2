package com.cfg.chaakri.chaakri;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
Button customerloginbutton,sakhiloginbutton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        customerloginbutton=(Button)findViewById(R.id.customerloginbutton);
        sakhiloginbutton=(Button)findViewById(R.id.sakhiloginbutton);
        customerloginbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent();

            }
        });
        sakhiloginbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(getApplicationContext(),SakhiFirst.class);
                startActivity(intent);

            }
        });
    }
}
